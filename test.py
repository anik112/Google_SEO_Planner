import sys
from selenium import webdriver
import time

# saving file metter
file_name = 'ss.html'

# get perametter from console
keywordName=sys.argv[1]
#keywordName='dog'
options = webdriver.ChromeOptions() 
#remove chorme popup window
#options.add_argument("--headless")
#start web browser
browser=webdriver.Chrome(options=options)
# get source code
browser.get("https://www.semrush.com/analytics/keywordoverview/?q="+keywordName+"&db=us")

browser.find_elements_by_class_name("sso-tabs__el")[1].click()

browser.find_element_by_name("email").send_keys("osshuvo@gmail.com")
browser.find_element_by_name("password").send_keys("*shuva1250*")

#browser.find_element_by_name("email").send_keys("adamella147@gmail.com")
#browser.find_element_by_name("password").send_keys("*ella2021#")

browser.find_elements_by_class_name("sso-submit")[0].click()

time.sleep(5)

html = browser.page_source
time.sleep(5)

#print(html)

#complete_name = os.path.join(file_name)
with open(file_name, "w", encoding="utf-8") as file_object:

    file_object.write(html)

    file_object.close()

# close web browser

browser.close()

sys.exit()



#-------------------  Test codes

# # importing the library
# from bs4 import BeautifulSoup
 
# # Initializing variable
# gfg = BeautifulSoup(html)
 
# # Calculating result
# res = gfg.get_text()
 
# Printing the result
#print(res)