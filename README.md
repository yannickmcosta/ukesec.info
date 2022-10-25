# UK Electricity Supply Emergency Code - ukesec.info

<img width="1913" alt="image" src="https://user-images.githubusercontent.com/2808874/197845888-34dca3a2-b2d7-43ab-be68-b1f811a5fb55.png">

An interactive site created off the back of the UK Department for Business, Energy and Industrial Strategy's Electricity Supply Emergency Code. Designed to help people find when they could be subject to electricity blackouts.

Site can be run in a docker container, in Apache, Nginx or any webserver flavour of your choice. It's pretty much a single-filer if you were that way inclined.

### How it's run at the moment
At present, this is self-hosted in my infrastructure. It's a single docker container. All JSON files are Cached in Cloudflare to reduce the load and bandwidth on the origin servers.

As with my other projects, this has been designed to scratch an itch that the Government hasn't bothered to do. It's fully interactive, accessible, and I am absolutely open to feedback, issues, improvements, etc. Please feel free to fork this code, or open an issue and it can be reviewed.

### Disclaimers and General Info

This site has been created on the back of recent publications in media and news outlets of potential energy restrictions and "load shedding" in the winter of 2022. The [PDF](https://www.gov.uk/government/publications/electricity-supply-emergency-code) published by the Government is where this data has been parsed from, however it can be a little confusing to read. Therefore this intention of this site is to allow users to interactively select their Load Block, the current Level of Disconnection, and this site will display when to expect disconnections.

As this data is parsed from a third party source, **it is provided without any warranty whatsoever, as is**, and you are encouraged to [read the original PDF](https://www.gov.uk/government/publications/electricity-supply-emergency-code) to gain insight into the authoritative data, and contact your electricity supplier if you have any questions or concerns.

This site is not affiliated with HM Goverment or any Governmental Body, and has been created purely for educational purposes only.

### Attributions

For the scheduling view within this site, code from https://github.com/Yehzuna/jquery-schedule has been utilised. The distributables in minified form are bundled with this repository. The code in the original repository from @Yehzuna is licensed under the MIT License, and as such, it is included below:

The below MIT License applies to the following files in this repository:

* assets/js/yehzuna.jquery.schedule.min.js
* assets/css/yehzuna.jquery.schedule.min.css

```
MIT License

Copyright (c) 2017 Thomas BORUSZEWSKI

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
```
