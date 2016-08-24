
/**
 * svgLoader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;( function( window ) {
	'use strict';
	function extend( a, b ) {
		for( var key in b ) { 
//hasOwnProperty()函数用于指示一个对象自身(不包括原型链)是否具有指定名称的属性。如果有，返回true，否则返回false。
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function SVGLoader( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );//先将自己的抽成数组
		extend( this.options, options );//先按页面下写的设置来
		this._init();
	}

	SVGLoader.prototype.options = {//保险起见
		speedIn : 500,
		easingIn : mina.linear
	}

	SVGLoader.prototype._init = function() {
//querySelector() 方法仅仅返回匹配指定选择器的第一个元素。如果你需要返回所有的元素，请使用 querySelectorAll() 方法替代。
		var s = Snap( this.el.querySelector( 'svg' ) );//取得svg并绘制
		this.path = s.select( 'path' );
		this.initialPath = this.path.attr('d');
		//多个路径的情况
		var openingStepsStr = this.el.getAttribute( 'data-opening' );
		this.openingSteps = openingStepsStr ? openingStepsStr.split(';') : '';
		this.openingStepsTotal = openingStepsStr ? this.openingSteps.length : 0;
		if( this.openingStepsTotal === 0 ) return;

		// if data-closing is not defined then the path will animate to its original shape
		var closingStepsStr = this.el.getAttribute( 'data-closing' ) ? this.el.getAttribute( 'data-closing' ) : this.initialPath;
		this.closingSteps = closingStepsStr ? closingStepsStr.split(';') : '';
		this.closingStepsTotal = closingStepsStr ? this.closingSteps.length : 0;
		
		this.isAnimating = false;
//防止为空的情况
		if( !this.options.speedOut ) {
			this.options.speedOut = this.options.speedIn;
		}
		if( !this.options.easingOut ) {
			this.options.easingOut = this.options.easingIn;
		}
	}

	SVGLoader.prototype.show = function(tcallback) {
		if( this.isAnimating ) return false;//保证初始化可以调用
		this.isAnimating = true;
		// animate svg
		var self = this,
			onEndAnimation = function() {//只是定义
				self.el.classList.add('pageload-loading');
                tcallback();//实现回调(调用hide方法)
			};
		this._animateSVG( 'in', onEndAnimation );// 开始动画
		self.el.classList.add('show');
	}

	SVGLoader.prototype.hide = function() {
		var self = this;
		this.el.classList.remove('pageload-loading');
		this._animateSVG( 'out', function() { 
			// reset path
			self.path.attr( 'd', self.initialPath );
			self.el.classList.remove('show');
			self.isAnimating = false; 
		} );
	}

	SVGLoader.prototype._animateSVG = function( dir, callback ) {
		var self = this,
			pos = 0,
			steps = dir === 'out' ? this.closingSteps : this.openingSteps,
			stepsTotal = dir === 'out' ? this.closingStepsTotal : this.openingStepsTotal,
			speed = dir === 'out' ? self.options.speedOut : self.options.speedIn,
			easing = dir === 'out' ? self.options.easingOut : self.options.easingIn,
			nextStep = function( pos ) {
				if( pos > stepsTotal - 1 ) {
					if( callback && typeof callback == 'function' ) {
						callback();
					}
					return;
				}
				//播放动画
				self.path.animate( { 'path' : steps[pos] }, speed, easing, function() { nextStep(pos); } );
				pos++;//回调递归，直到大于stepsTotal
			};

		nextStep(pos);
	}

	// add to global namespace
	// 污染全局空间 
	window.SVGLoader = SVGLoader;

})( window );

var loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 500, easingIn : mina.easeinout } );
loader.show(function(){
	loader.isAnimating =false;
});