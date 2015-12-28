# ASpace

[![npm](https://img.shields.io/npm/v/aspace.svg?style=flat-square)](https://www.npmjs.com/package/aspace)
[![npm](https://img.shields.io/npm/l/aspace.svg?style=flat-square)](https://www.npmjs.com/package/aspace)
[![npm](https://img.shields.io/npm/dt/aspace.svg?style=flat-square)](https://www.npmjs.com/package/aspace)

Add space between English and CJK(Chinese, Japanese and Korean).

强迫症的福音: CJK(中日韩统一表意文字) 与 英文字母之间自动加入空格

## Install

```
$ npm install aspace
```

## Usage

Parameter:
```javascript
aSpace('测试test测试');  // string
aSpace(document.body);  // element
aSpace(document.getElementsByClassName('example'));  // element array
```

Ignore some node: add className 'no-space'
```html
<p class="no-space">设置no-space: test测试test测试</p>
```

Used in input field:
```html
<input type="text" onchange="this.value = aSpace(this.value);">
```

## Development

```
$ npm install
$ npm install -g gulp
$ gulp
```

## LICENSE

MIT © [DIYgod](http://github.com/DIYgod)