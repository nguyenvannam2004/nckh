import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
from scipy import stats

# Đọc dữ liệu
data = pd.read_csv('water_potability.csv')

# 1. Thống kê mô tả (Descriptive statistics)
print("Thống kê mô tả:")
print(data.describe())

# 2. Kiểm tra phân phối của dữ liệu (tính skewness và kurtosis)
print("\nSkewness và Kurtosis của các cột:")
for col in data.columns:
    if data[col].dtype == 'float64':  # Kiểm tra các cột số
        skewness = data[col].skew()
        kurtosis = data[col].kurt()
        print(f'{col} - Skewness: {skewness:.2f}, Kurtosis: {kurtosis:.2f}')

# 3. Kiểm tra phân phối chuẩn (Shapiro-Wilk Test)
print("\nKiểm tra phân phối chuẩn (Shapiro-Wilk Test):")
for col in data.columns:
    if data[col].dtype == 'float64':  # Chỉ kiểm tra các cột số
        stat, p_value = stats.shapiro(data[col].dropna())  # Kiểm tra phân phối chuẩn
        print(f'{col} - p-value: {p_value:.4f}')
        if p_value < 0.05:
            print(f'  => Dữ liệu không phân phối chuẩn (p-value < 0.05)\n')
        else:
            print(f'  => Dữ liệu phân phối chuẩn (p-value >= 0.05)\n')

# 4. Phân phối của nhãn (Potability)
print("\nPhân phối nhãn 'Potability':")
print(data['Potability'].value_counts())

# Vẽ biểu đồ phân phối nhãn (Potability)
sns.countplot(data=data, x='Potability')
plt.title("Phân phối nhãn Potability")
plt.show()

# 5. Heatmap của mối quan hệ giữa các đặc trưng
plt.figure(figsize=(12, 8))
correlation_matrix = data.corr()  # Tính toán ma trận tương quan
sns.heatmap(correlation_matrix, annot=True, cmap='coolwarm', fmt=".2f", linewidths=0.5)
plt.title("Ma trận tương quan giữa các đặc trưng")
plt.show()

# 6. Vẽ các biểu đồ phân phối cho các cột số
numeric_columns = data.select_dtypes(include=['float64']).columns
plt.figure(figsize=(15, 10))
for i, col in enumerate(numeric_columns, 1):
    plt.subplot(3, 3, i)
    sns.histplot(data[col], kde=True)
    plt.title(f'Phân phối của {col}')
plt.tight_layout()
plt.show()

# 7. Kiểm tra mối quan hệ giữa các đặc trưng và nhãn (Potability)
plt.figure(figsize=(15, 10))
for i, col in enumerate(numeric_columns, 1):
    plt.subplot(3, 3, i)
    sns.boxplot(x=data['Potability'], y=data[col])
    plt.title(f'Mối quan hệ giữa {col} và Potability')
plt.tight_layout()
plt.show()

