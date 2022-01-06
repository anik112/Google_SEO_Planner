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
browser.find_elements_by_class_name("sso-tabs__el")[1].click()

#browser.find_element_by_name("email").send_keys("osshuvo@gmail.com")
#browser.find_element_by_name("password").send_keys("*shuva1250*")

browser.find_element_by_name("email").send_keys("adamella147@gmail.com")
browser.find_element_by_name("password").send_keys("*ella2021#")


#browser.find_element_by_name("email").send_keys("shuvaofficial5@gmail.com")
#browser.find_element_by_name("password").send_keys("*ella2021#")
browser.find_elements_by_class_name("sso-submit")[0].click()

time.sleep(2)

#delay = 5 # seconds
#try:
#    myElem = WebDriverWait(browser, delay).until(EC.presence_of_element_located((By.ByClassName, 'kwo-serp-table__table')))
#    print ("Page is ready!")
#except TimeoutException:
#    print ("Loading took too much time!")

html = browser.page_source

#print(html)

#complete_name = os.path.join(file_name)
with open(file_name, "w", encoding="utf-8") as file_object:

    file_object.write(html)
    file_object.close()

# close web browser
#
browser.close()
print("Complete")
#sys.exit()
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