# requests可以自動添加header提取網頁內容，避免被網站封鎖
import requests

res = requests.get("http://isin.twse.com.tw/isin/C_public.jsp?strMode=2")
#若須取得上櫃資料，僅替換網址 "http://isin.twse.com.tw/isin/C_public.jsp?strMode=4"

import pandas as pd

df = pd.read_html(res.text)[0]


# 移除權證、期貨
def stock_filter(element):
    stock_list = element
    if 'TW0000' in stock_list:
        return False
    elif 'A' in stock_list or 'B' in stock_list or 'C' in stock_list or 'D' in stock_list or 'E' in stock_list or 'F' in stock_list:
        return False
    elif 'KYG' in stock_list:
        return True
    elif 'TW00' in stock_list:
        return True
    else:
        return False


# 除DR
def stock_filter2(element):
    stock_list = element
    if 'DR' in stock_list:
        return False
    else:
        return True


def stock_num(data):
    data.split(" ")
    return data[0:4]


def stock_name(data):
    data.split(" ")
    return data[4:]


# 設定columns名子
df.columns = df.iloc[0]

# 設定回表格
df = df.iloc[2:, [0, 1, 2, 3, 4]]

df["有價證券代號"] = df["有價證券代號及名稱"].apply(stock_num)
df["有價證券名稱"] = df["有價證券代號及名稱"].apply(stock_name)

# 改變columns排序
cols = ['有價證券代號', '有價證券名稱', '國際證券辨識號碼(ISIN Code)', '上市日', '市場別', '產業別']
df = df.loc[:, cols]

# 過濾
bool_filter = df["國際證券辨識號碼(ISIN Code)"].apply(stock_filter)
bool_filter2 = df["有價證券名稱"].apply(stock_filter2)
df = df[bool_filter]
df = df[bool_filter2]
df.to_csv("stock_上市.csv", index=False, encoding="utf-8")