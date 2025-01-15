# import numpy as np
# import pandas as pd
# import pandas as pd
# import matplotlib.pyplot as plt
# import scipy.stats as stats


# file_path = 'water_potability.csv'
# data = pd.read_csv(file_path)

# print(data.shape)

# print('Tổng quan dữ liệu: ')
# print(data.info())
# print('Phân phối dữ liệu: ')
# print(data.describe())

# số_lượng_nhãn = data['Potability'].value_counts()
# print(số_lượng_nhãn)

# median_values = data['ph'].mean()
# data['ph'] = data['ph'].fillna(median_values)

# median_values = data['Sulfate'].mean()
# data['Sulfate'] = data['Sulfate'].fillna(median_values)

# median_values = data['Trihalomethanes'].mean()
# data['Trihalomethanes'] = data['Trihalomethanes'].fillna(median_values)

# column_name = 'Sulfate'  # Thay 'column_name' bằng tên cột thực tế của bạn Trihalomethanes Sulfate

# # Vẽ histogram
# data[column_name].dropna().hist(bins=20, edgecolor='black')
# plt.title(f'Histogram of {column_name}')
# plt.xlabel('Value')
# plt.ylabel('Frequency')
# plt.show()

# # Vẽ Q-Q plot
# stats.probplot(data[column_name].dropna(), dist="norm", plot=plt)
# plt.title(f'Q-Q Plot of {column_name}')
# plt.show()

# # Tính độ lệch (skewness)
# skewness = data[column_name].skew()
# print(f"Skewness of {column_name}: {skewness}")

# # Tính độ nhọn (kurtosis)
# kurtosis = data[column_name].kurt()
# print(f"Kurtosis of {column_name}: {kurtosis}")

# # Kiểm định Shapiro-Wilk
# stat, p_value = stats.shapiro(data[column_name].dropna())
# print(f"Shapiro-Wilk test p-value: {p_value}")

# # Kiểm tra phân phối chuẩn
# if p_value < 0.05:
#     print(f"Dữ liệu trong cột '{column_name}' không có phân phối chuẩn (p-value < 0.05).")
# else:
#     print(f"Dữ liệu trong cột '{column_name}' có phân phối chuẩn (p-value >= 0.05).")




import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import scipy.stats as stats

# Đọc dữ liệu từ file CSV
file_path = 'water_potability.csv'
data = pd.read_csv(file_path)

# In thông tin tổng quan về dữ liệu
print(data.shape)
print('Tổng quan dữ liệu: ')
print(data.info())
print('Phân phối dữ liệu: ')
print(data.describe())

# In số lượng nhãn trong cột 'Potability'
số_lượng_nhãn = data['Potability'].value_counts()
print(số_lượng_nhãn)

# Loại bỏ tất cả các dòng có giá trị NaN
data = data.dropna()

# Vẽ histogram cho cột 'Sulfate'
column_name = 'Sulfate'  # Thay 'column_name' bằng tên cột thực tế của bạn
data[column_name].hist(bins=20, edgecolor='black')
plt.title(f'Histogram of {column_name}')
plt.xlabel('Value')
plt.ylabel('Frequency')
plt.show()

# Vẽ Q-Q plot cho cột 'Sulfate'
stats.probplot(data[column_name], dist="norm", plot=plt)
plt.title(f'Q-Q Plot of {column_name}')
plt.show()

# Tính độ lệch (skewness) và độ nhọn (kurtosis)
skewness = data[column_name].skew()
print(f"Skewness of {column_name}: {skewness}")

kurtosis = data[column_name].kurt()
print(f"Kurtosis of {column_name}: {kurtosis}")

# Kiểm định Shapiro-Wilk để kiểm tra phân phối chuẩn
stat, p_value = stats.shapiro(data[column_name])
print(f"Shapiro-Wilk test p-value: {p_value}")

# Kiểm tra phân phối chuẩn
if p_value < 0.05:
    print(f"Dữ liệu trong cột '{column_name}' không có phân phối chuẩn (p-value < 0.05).")
else:
    print(f"Dữ liệu trong cột '{column_name}' có phân phối chuẩn (p-value >= 0.05).")

# Lưu lại dữ liệu đã xử lý vào file CSV mới
data.to_csv('./newdata1.csv', index=False)




