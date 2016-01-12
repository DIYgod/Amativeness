/**
 * ASpace function
 *
 * @param {Object} target - it can be element array, element, string
 */

function aSpace(target) {
    var EnglishCJK = /([a-zA-Z0-9\,\:\?\!\+\*])([\u4e00-\u9fff\u3400-\u4dbf\uf900-\ufaff\u3040-\u309f\uac00-\ud7af\+\*])/g;
    var CJKEnglish = /([\u4e00-\u9fff\u3400-\u4dbf\uf900-\ufaff\u3040-\u309f\uac00-\ud7af\,\:\?\!\+\*])([a-zA-Z0-9\+\*])/g;
    var ignoreTags = ['script', 'title', 'meta', 'style'];
    var ignoreClass = 'no-space';

    var type = Object.prototype.toString.call(target);
    if (type === '[object String]') {
        return space(target);
    }
    else if (type === '[object HTMLDivElement]') {
        spaceNode(target);
    }
    else if (type === '[object HTMLCollection]') {
        for (var i = 0; i < target.length; i++) {
            spaceNode(target[i]);
        }
    }

    function test(string) {
        return EnglishCJK.test(string) || CJKEnglish.test(string)
    }

    function space(string) {
        return string.replace(CJKEnglish, '$1 $2').replace(EnglishCJK, '$1 $2');
    }

    function spaceNode(node) {
        for (var i = 0; i < node.childNodes.length; i++) {
            if (node.childNodes[i].nodeType === 3
                && node.childNodes[i].nodeValue
                && test(node.childNodes[i].nodeValue)) {
                node.childNodes[i].nodeValue = space(node.childNodes[i].nodeValue);
            }
            else if (node.childNodes[i].nodeType === 1
                && !node.childNodes[i].classList.contains(ignoreClass)
                && ignoreTags.indexOf(node.childNodes[i].nodeName.toLowerCase()) === -1) {
                spaceNode(node.childNodes[i]);
            }
        }
    }
}