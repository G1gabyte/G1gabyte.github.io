from lxml import etree
import requests

from time import sleep

import matplotlib.pyplot as plt

import re



# plt.plot([1,2,3,4], 'ro')
# plt.ylabel('some numbers')
# plt.show()

def calculate(time):
	page = requests.get('http://www.tradingeconomics.com/stocks')
	tree = etree.HTML(page.text)
	country = tree.xpath('./body/form/div/div/div/div/div/table/tbody/tr/td/a/b/text()')
	daily = tree.xpath('./body/form/div/div/div/div/div/table/tbody/tr/td[@id="pch"]/text()	')
	information = {}


	day = re.findall(r"[-+]?\d*\.\d+|\d+", str(daily))
	# content = etree.tostring(element[1])
	# country = list(set(country))
	for i in range(0, 22):
		information[country[i]] = float(day[i])
	# for i in country:
		# country = etree.tostring(i)
		# print "Country: ", i
		# print i
	# print(etree.tostring(daily))
	# print information

	for x in sorted(information):
		print x, ": ", information[x], "%"
	# 
	# print daily
	# for i in daily.split():
		# print float(i)
	# print daily
	print "{0:14s}|".form`at(time), "--------------------------------------", time
	time = time+1
	sleep(5)
	calculate(time)
calculate(0);