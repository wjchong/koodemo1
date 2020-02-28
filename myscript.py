import string
import random
from hashlib import sha256

def id_generator(size=6, chars=string.ascii_uppercase + string.digits):
    return ''.join(random.choice(chars) for _ in range(size))
id=id_generator()

app_id = "9URXC60Q51V2MK1UPMVW2WP8" #(Please refer to required parameters section)
campaign_name = id
api_secret = "ZPU8MRD61OPZ" # This is the sample key. Each app has a different secret key
signature_key = app_id+'|'+ campaign_name+'|'+ api_secret
signature = sha256(signature_key.encode('utf-8')).hexdigest()  
print(id+","+signature)
