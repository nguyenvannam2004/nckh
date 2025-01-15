import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.impute import SimpleImputer
from sklearn.model_selection import train_test_split
from sklearn.utils import resample
from keras.models import Sequential
from keras.layers import Dense,Dropout
from keras.optimizers import Adam
from sklearn.metrics import classification_report, confusion_matrix
from scipy.ndimage import gaussian_filter1d  # Gaussian smoothing

# Giả sử dữ liệu của bạn có tên là df
df = pd.read_csv('water_potability.csv')  # Thay 'your_data.csv' bằng đường dẫn đến tệp dữ liệu của bạn

# 1. Kiểm tra giá trị thiếu và xử lý
print("Số lượng giá trị thiếu trong mỗi cột:")
print(df.isnull().sum())

# Sử dụng SimpleImputer để thay thế giá trị thiếu bằng median
imputer = SimpleImputer(strategy='mean')
df_imputed = pd.DataFrame(imputer.fit_transform(df), columns=df.columns)

# 2. Xử lý nhiễu bằng Gaussian smoothing (smoothing để giảm nhiễu)
columns_to_smooth = ['ph', 'Hardness', 'Solids', 'Chloramines', 'Sulfate', 'Conductivity', 'Organic_carbon', 'Trihalomethanes', 'Turbidity']
for col in columns_to_smooth:
    df_imputed[col] = gaussian_filter1d(df_imputed[col], sigma=1)  # Lọc với độ mượt sigma=1



# 2. Chuẩn hóa dữ liệu
scaler = StandardScaler()
columns_to_scale = ['ph', 'Hardness', 'Solids', 'Chloramines', 'Sulfate', 'Conductivity', 'Organic_carbon', 'Trihalomethanes', 'Turbidity']
df_imputed[columns_to_scale] = scaler.fit_transform(df_imputed[columns_to_scale])

# 3. Xử lý mất cân bằng lớp (Potability)
df_majority = df_imputed[df_imputed['Potability'] == 0]
df_minority = df_imputed[df_imputed['Potability'] == 1]



# Upsample minority class
df_minority_upsampled = resample(df_minority, 
                                 replace=True,     # Sampling with replacement
                                 n_samples=len(df_majority),  # Equal to majority class
                                 random_state=42)  # To ensure reproducibility

# Kết hợp lại
df_balanced = pd.concat([df_majority, df_minority_upsampled])

# 4. Tách dữ liệu thành X (features) và y (label)
X = df_balanced.drop('Potability', axis=1)
y = df_balanced['Potability']

# 5. Chia tập dữ liệu thành tập huấn luyện và kiểm tra (80% train, 20% test)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# 6. Xây dựng mô hình mạng nơ-ron đơn giản
model = Sequential()

# Lớp đầu vào và lớp ẩn đầu tiên
model.add(Dense(512, input_dim=X_train.shape[1], activation='relu'))
model.add(Dropout(0.5))
# Lớp ẩn thứ hai
model.add(Dense(256, activation='relu'))
model.add(Dropout(0.4))
model.add(Dense(128, activation='relu'))
model.add(Dropout(0.3))
model.add(Dense(64, activation='relu'))
model.add(Dropout(0.2))
model.add(Dense(32, activation='relu'))
model.add(Dropout(0,1))
model.add(Dense(16, activation='relu'))
model.add(Dropout(0,1))
model.add(Dense(8, activation='relu'))
model.add(Dropout(0,1))
model.add(Dense(4, activation='relu'))
model.add(Dropout(0,1))
model.add(Dense(2, activation='relu'))
model.add(Dropout(0,1))
# Lớp đầu ra (vì là bài toán phân loại nhị phân, dùng sigmoid)
model.add(Dense(1, activation='sigmoid'))

# 7. Biên dịch mô hình
model.compile(optimizer=Adam(learning_rate=0.005), loss='binary_crossentropy', metrics=['accuracy'])

# 8. Huấn luyện mô hình
history = model.fit(X_train, y_train, epochs=100, batch_size=32, validation_data=(X_test, y_test), verbose=1)

# 9. Đánh giá mô hình trên tập kiểm tra
y_pred = model.predict(X_test)
y_pred = (y_pred > 0.5)  # Chuyển sang 0 hoặc 1 dựa trên ngưỡng 0.5

# In ra kết quả đánh giá
print("Classification Report:")
print(classification_report(y_test, y_pred))

print("Confusion Matrix:")
print(confusion_matrix(y_test, y_pred))

# 10. (Tuỳ chọn) Vẽ đồ thị loss và accuracy trong quá trình huấn luyện
import matplotlib.pyplot as plt

# Đồ thị loss
plt.plot(history.history['loss'], label='Loss')
plt.plot(history.history['val_loss'], label='Validation Loss')
plt.title('Loss over Epochs')
plt.xlabel('Epochs')
plt.ylabel('Loss')
plt.legend()
plt.show()

# Đồ thị accuracy
plt.plot(history.history['accuracy'], label='Accuracy')
plt.plot(history.history['val_accuracy'], label='Validation Accuracy')
plt.title('Accuracy over Epochs')
plt.xlabel('Epochs')
plt.ylabel('Accuracy')
plt.legend()
plt.show()
