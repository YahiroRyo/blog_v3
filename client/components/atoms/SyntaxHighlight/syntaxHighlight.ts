import js from 'highlight.js/lib/languages/javascript';
import md from 'highlight.js/lib/languages/markdown';
import hljs from 'highlight.js/lib/core';
import { useEffect } from 'react';

const useSyntaxHighlight = () => {
  useEffect(() => {
    hljs.registerLanguage('js', js);
    hljs.registerLanguage('md', md);
    hljs.initHighlighting();
  });
};

export default useSyntaxHighlight;
