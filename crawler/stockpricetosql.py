import requests
import numpy as np
import pandas as pd
import datetime
import json
import datetime
import random
import time
import pymysql
from sqlalchemy import create_engine
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

res = requests.get("http://isin.twse.com.tw/isin/C_public.jsp?strMode=2")
df = pd.read_html(res.text)[0]

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

#全部證券代號type list
stock_list = df['有價證券代號'].values.tolist()



#今天日期
def crawl_price(stock_list):
    now = datetime.datetime.now()
    date = str(now.year) + '-' + str(now.month) + '-' + str(now.day)
    column = ['Stock_no','Date', 'Volume', 'Value', 'Open', 'High', 'Low', 'Close', 'Transaction']
    df = pd.DataFrame(columns=column)
    for stock_no in stock_list:
        print(date, stock_no)
        url = 'http://www.twse.com.tw/exchangeReport/STOCK_DAY?date=%s&stockNo=%s' % ( date, stock_no)
        r = requests.get(url)
        stock_no = int(stock_no)
        data = json.loads(r.text)['data']
        index = len(data)-1
        Volume = int(data[index][1].replace(',', ''))
        Value = int(data[index][2].replace(',', ''))
        Open = float(data[index][3].replace(',', ''))
        High = float(data[index][4].replace(',', ''))
        Low = float(data[index][5].replace(',', ''))
        Close = float(data[index][6].replace(',', ''))
        Transaction = int(data[index][8].replace(',', ''))
        s = pd.Series([stock_no,date,Volume,Value,Open,High,Low,Close,Transaction] , index = column)
        df = df.append(s, ignore_index = True)
        secs = random.randint(10, 20) + 20
        time.sleep(secs)
        print('sleep')
    return df


df = crawl_price(stock_list)
print(df)



engine = create_engine("mysql+pymysql://{}:{}@{}/{}?charset={}".format('root', 'root', '127.0.0.1:3306', 'finance','utf8'))
con = engine.connect()
df.to_sql(name='stockprice', con=con, if_exists='append', index=False)



