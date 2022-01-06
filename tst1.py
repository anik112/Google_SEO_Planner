import sys
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.common.exceptions import TimeoutException
import time

# saving file metter
file_name = 'ss1.html'

# get perametter from console
keywordName=sys.argv[1]
#keywordName='youtube'
options = webdriver.ChromeOptions() 
#remove chorme popup window
#options.add_argument("--headless")
#start web browser
browser=webdriver.Chrome(options=options)
# get source code
browser.get("https://www.semrush.com/analytics/keywordoverview/?q="+keywordName+"&db=us")
#browser.find_elements_by_class_name("sso-tabs__el")[1].click()

browser.close()
print("Complete")
sys.exit()
print("Sys")

#-------------------  Test codes

# # importing the library
# from bs4 import BeautifulSoup
 
# # Initializing variable
# gfg = BeautifulSoup(html)
 
# # Calculating result
# res = gfg.get_text()
 
# Printing the result
#print(res)