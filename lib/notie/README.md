# notie

[![NPM version](https://img.shields.io/npm/v/notie.svg?style=flat-square)](https://www.npmjs.com/package/notie)
[![NPM download](https://img.shields.io/npm/dm/notie.svg?style=flat-square)](https://www.npmjs.com/package/notie)

A corner tip utility for [Chelly](https://github.com/egoist/chelly).

## Install

Hot-link the `./browser/notie.js` in your web page directly, CSS is automatically included.

or via NPM:

```bash
npm i -S notie
```

## Usage

```javascript
// if you are using webpack
import notie from 'notie'
// tell notie to show `hello world` info and auto-hide it.
notie('info', 'hello world', true)
// or use object as argument
notie({
  type: 'info',
  text: 'hello world',
  autoHide: true
})
```

## Development

```bash
npm install -g gulp runfile
# build for webpack and browser
# run this each time you want to make new release
run build
# run gulp for development
run dev
```

## License

MIT.
