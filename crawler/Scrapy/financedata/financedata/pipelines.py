# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html
import pymysql

class FinancedataPipeline:
    #開啟爬蟲要做的動作
    def open_spider(self, spider):
        sql = "create table if not exists news (Title VARCHAR(255), Img  VARCHAR(200), Content TEXT, Time VARCHAR(50));"
        self.con = pymysql.connect(host='127.0.0.1', port=3306, user='root', passwd='root', charset='utf8',db='finance')
        self.cur = self.con.cursor()
        self.cur.execute(sql)
        #pass

    # 關閉爬蟲要做的動作
    def close_spider(self, spider):
        self.con.commit()
        self.con.close()
        #pass


    def process_item(self, item, spider):
        self.cur.execute("""insert into news values (%s,%s,%s,%s)""", (
            item['title'],
            item['img'],
            item['content'],
            item['time']
       ))

        return item
