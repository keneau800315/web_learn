import scrapy
from bs4 import BeautifulSoup
from financedata.items import FinancedataItem
from scrapy.spiders import CrawlSpider, Rule
from scrapy.linkextractors import LinkExtractor
import requests
import pandas as pd
import json

#開啟爬蟲類別
class NewsCrawler(CrawlSpider):
    #給名稱
    name = "news"
    #起始抓取連結，可有多列用List
    start_urls=['https://ec.ltn.com.tw/list/securities']
    #抓取符合allow樣式的樣式
    rules = [
        Rule(LinkExtractor(allow = ('/list/securities/[1-5]$')), callback = 'parse_list', follow = True)
    ]

    #定義函示接取爬蟲內容
    def parse_list(self, response):
        #回應在response.body中
        res = BeautifulSoup(response.body)
        res_ullist= res.find('ul', class_ = 'list')
        for news in res_ullist.find_all('a', class_= 'boxText'):
            #print(news['href'])
            yield scrapy.Request(news['href'], self.parse_detail)

    def parse_detail(self, response):
        res = BeautifulSoup(response.body)
        #title = res.select('h1')[0].text
        con = res.find('div', class_ = 'text').find_all('p')
        img_url = res.find('span', class_ = 'ph_i').find_all('img')[0]["src"]
        content = con[1:(len(con)-2)]
        text = ""
        for con in content:
            text = text+con.text

        financedataItem = FinancedataItem()
        #順序需與items.py中相同，資料放入物件中


        financedataItem['title'] = res.select('h1')[0].text
        financedataItem['img'] = img_url
        financedataItem['content'] = text
        financedataItem['time'] = res.find('span', class_= 'time').text
#        print('title',res.select('h1')[0].text)
#        print('content', text)
#        print('time', res.find('span', class_= 'time').text)

        return  financedataItem

