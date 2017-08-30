# Affiliate Link Localizer

You are a content creator and you make money through Amazon affiliate links.
Unfortunately, there are multiple country specific Amazon associate programs and you have different associate IDs across the different programs.
However, to earn your comission you need to (a) send customers to the Amazon store they are most likely to shop from, and (b) send along your associate ID for that store.

There are a number of great online services that solve this problem at scale. But if you're just starting out (and don't want to pay), if you're concerned about lock-in, or if you're just a hacker with fidgety fingers :) then this repository contains a simple php script that solves problems a and b above. Simply deploy it on your own webserver and start linking :)


# Synopsis

Create a `config.json` file with the following contents:
```json
{
  "amazon": {
    "US": "<your-associates-id>",
    "UK": "<your-associates-id>",
    "DE": "<your-associates-id>",
    "IT": "<your-associates-id>",
    "FR": "<your-associates-id>",
    "CA": "<your-associates-id>",
    "ES": "<your-associates-id>",
    "IN": "<your-associates-id>",
  }
}
```

Deploy the script on a webserver you own and put the above config file in the same directory.

Assuming you named the php file `index.php` and assuming that your domain is: `amazon.example.com` then you can now construct URLs like `amazon.example.com?id=0123456789`. Replace the numbers `0123456789` with the product id of the product you want to link to.

When receiving a request, the script will check what region the user is in (based on IP, using the service [ipinfo.io](https://ipinfo.io)) and redirect the user to the closest Amazon store along with your associates ID for that particular store.


# Issues

Please feel absolutely free to open issues or submit PRs if you see room for improvement, if something is not working, or if you have questions about the script. Thanks :)


# License

MIT License

Copyright (c) 2017 Christopher Okhravi

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.


