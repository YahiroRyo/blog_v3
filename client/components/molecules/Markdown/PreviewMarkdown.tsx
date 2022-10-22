import { CSSProperties, useEffect, useState } from 'react';
import { markdownOfHTML } from '../../../wasm-markdown/pkg/wasm_markdown';
import useSyntaxHighlight from '../../atoms/SyntaxHighlight/syntaxHighlight';
import HtmlText from '../../atoms/Text/HtmlText';
import 'highlight.js/styles/github.css';
import Editor from './Editor';

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
      <Editor style={{ width: '100%' }} value={markdown} setValue={setMarkdown} />
    </div>
  );
};

export default PreviewMarkdown;
