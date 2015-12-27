import Styles from './notie.css'
import error from './svg/icon-error.svg'
import success from './svg/icon-success.svg'
import warning from './svg/icon-warning.svg'
import info from './svg/icon-info.svg'
const svgs = {
  info, success, warning, error
}

const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

class Notie {
  constructor (opts) {
    this.opts = this.opts || {}
    if (typeof opts[0] === 'object') {
      this.opts = opts[0]
      this.opts.type = this.opts.type ? this.opts.type : 'info'
      if (!this.opts.text) {
        return console.error('No text provided...')
      }
      this.opts.autoHide = (typeof this.opts.autoHide === 'undefined') ? true : this.opts.autoHide
    } else {
      if (!opts || opts.length === 0) {
        return console.error('lack of arguments...')
      } else if (opts.length === 1) {
        this.opts.type = 'info'
        this.opts.text = opts[0]
        this.opts.autoHide = true
      } else {
        this.opts.type = opts[0]
        this.opts.text = opts[1]
        this.opts.autoHide = (typeof opts[2] === 'undefined') ? true : opts[2]
      }
    }
    this.notify()
  }
  init () {
    const noties = document.createElement('div')
    noties.className = 'noties'
    $('body').appendChild(noties)
  }
  notify () {
    if (!$('.noties')) {
      this.init()
    }
    const notie = document.createElement('div')
    notie.className = `notie notie-${this.opts.type}${this.opts.autoHide ? '' : ' notie-auto-hide-disabled'}`
    notie.innerHTML = `
    <div class="notie-body">
      <span class="notie-svg">${svgs[this.opts.type]}</span>
      <span class="notie-text">${this.opts.text}</span>
    </div>
    `
    // append notie
    $('.noties').appendChild(notie)
    // show notie
    setTimeout(() => {
      notie.classList.add('notie-shown')
    }, 100)
    // store notie for tracking
    this.notie = notie
    // autoHide notie
    if (this.opts.autoHide) {
      setTimeout(() => {
        this.removeNotie()
      }, 3000)
    } else {
      notie.addEventListener('click', () => {
        this.removeNotie(notie)
      })
      notie.querySelector('a').addEventListener('click', (e) => {
        e.stopPropagation()
      })
    }
  }
  removeNotie (notie) {
    notie = notie || this.notie
    notie.classList.remove('notie-shown')
    setTimeout(() => {
      notie.remove()
    }, 200)
  }
}

const notie = (...opts) => {
  return new Notie(opts)
}

if (typeof module !== 'undefined') {
  module.exports = notie
} else if (typeof window !== 'undefined') {
  window.notie = notie
}
