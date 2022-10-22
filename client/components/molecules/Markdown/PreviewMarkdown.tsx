import { CSSProperties, useEffect, useState } from 'react';
import { markdownOfHTML } from '../../../wasm-markdown/pkg/wasm_markdown';
import TextArea from '../../atoms/Input/TextArea';
import useSyntaxHighlight from '../../atoms/SyntaxHighlight/syntaxHighlight';
import HtmlText from '../../atoms/Text/HtmlText';
import 'highlight.js/styles/github.css';

type PreviewMarkdownProps = {
  markdown: string;
  setMarkdown: (value: string) => void;
  style?: CSSProperties;
};

const PreviewMarkdown = ({ markdown, setMarkdown, style }: PreviewMarkdownProps) => {
  const [html, setHtml] = useState<string>('');

  useSyntaxHighlight();

  useEffect(() => {
    setHtml(markdownOfHTML(markdown));
  }, [markdown]);

  return (
    <div style={{ display: 'flex', columnGap: '2rem', ...style }}>
      <HtmlText style={{ width: '100%', backgroundColor: '#fff', padding: '2rem' }} html={html} />
      <TextArea style={{ width: '100%' }} value={markdown} onChange={(e) => setMarkdown(e.target.value)} />
    </div>
  );
};

export default PreviewMarkdown;
