import requests
import json
import time

class Frey:
    URL = 'https://freyapp.my.id/api/'

    cmd = {
        'call': 'spamcall',
        'wa': 'spam-wa',
        'bank': 'bank',
    }

    @classmethod
    def request(cls, url, params, key):
        headers = {"X-Apikey": key}
        response = requests.post(cls.URL + url, data=params, headers=headers)
        return response.text

    def spamcall(self, key, target, jumlah):
        loop = 0
        while jumlah > 0:
            call = self.request(self.cmd['call'], {'target': target}, key)
            response = json.loads(call)
            if response['status']:
                print('call ke', loop + 1, 'terkirim')
            else:
                print(response['message'])
            time.sleep(30)
            loop += 1
            jumlah -= 1

    def spamwa(self, key, target, jumlah):
        loop = 0  # line 33
        while jumlah > 0:
                call = self.request(self.cmd['wa'], {'target': target}, key)
        response = json.loads(call)
        if response['status']:
            print(f"whatsapp ke {loop + 1} terkirim")
        else:
            print(response['message'])
        time.sleep(30)
        loop += 1
        jumlah -= 1


    def bank(self, key, code=None, akun=None):
        if akun:
            bank = self.request(self.cmd['bank'], {'type': 'check', 'code': code, 'account_number': akun}, key)
            response = json.loads(bank)
            if response['status']:
                print('\nAccount Number:', response['data']['account_number'], '\nAccount Name:', response['data']['account_name'], '\n')
            else:
                print(response['message'])
        else:
            bank = self.request(self.cmd['bank'], {'type': 'list'}, key)
            response = json.loads(bank)
            if response['status']:
                for b in response['data']['bank']:
                    code = b['code']
                    bank_name = b['bank_name']
                    print('Code:', code, '\nBank:', bank_name, '\n')
            else:
                print(response['message'])

if __name__ == "__main__":
    print("""
    ____            _____
   / __ \__  ______/ /   |____
  / /_/ / / / / __  / /| /_  /
 / _, _/ /_/ / /_/ / ___ |/ /_
/_/ |_|\__,_/\__,_/_/  |_/___/
\n
**************************************
*                                    *
* Github : github.com/hanniehoneys   *
* Facebook : fb.com/hannie.vue       *
* Instagram : instagram.com/rud.az_  *
*                                    *
**************************************
\n\n""")
    
    print("Tunggu Sebentar.....!\n")
    time.sleep(2)
    
    print("""
\n\n
<========= - Pilih Versi - ==========>
1. SpamCall
2. Spam whatsapp
3. Bank Check
<========= - Pilih Angka - ==========>
\n\n""")
    
    tools = input("Pilih Versi : ")

    frey = Frey()

    if tools == '1':
        nomor = input("Masukan Nomor : ")
        jumlah = int(input("\nMasukan Jumlah : "))
        key = input("\nMasukan Key : ")
        frey.spamcall(key, nomor, jumlah)
    elif tools == '2':
        nomor = input("Masukan Nomor : ")
        jumlah = int(input("\nMasukan Jumlah : "))
        key = input("\nMasukan Key : ")
        frey.spamwa(key, nomor, jumlah)
    elif tools == '3':
        print("""
    \n\n
<========= - Pilih Type - ==========>
1. List Bank
2. Check Account
<========= - Pilih Angka - ==========>
    \n\n""")
        type_option = input("Type : ")

        if type_option == '1':
            key = input("\nMasukan Key : ")
            frey.bank(key)
        elif type_option == '2':
            code = input("\nMasukan code bank : ")
            nomor = input("\nMasukan nomor akun bank : ")
            key = input("\nMasukan Key : ")
            frey.bank(key, code, nomor)
        else:
            print('Type tidak ada di list')
