import requests
import sys

def send_template_message():
    return requests.post(
        "https://api.mailgun.net/v3/sandboxfdf7d3075d964f97a2e8f2717993603c.mailgun.org/messages",
        auth=("api", "6be954a3c8aee4bd83ba0755eccd4065-3939b93a-8fbec579"),
        data={"from": "Restaurant Excellent Taste <postmaster@sandboxfdf7d3075d964f97a2e8f2717993603c.mailgun.org>",
              "to": ["97041816@st.deltion.nl"],
              "subject": "Account activeren",
              "text": "Testing some Mailgun awesomness!"})


# send_template_message()
print(sys.argv[1])