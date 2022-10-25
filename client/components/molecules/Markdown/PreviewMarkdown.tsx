/** @jsxImportSource @emotion/react */
import { useEffect, useState } from 'react';
import { markdownOfHTML } from '../../../wasm-markdown/pkg/wasm_markdown';
import useSyntaxHighlight from '../../atoms/SyntaxHighlight/syntaxHighlight';
import HtmlText from '../../atoms/Text/HtmlText';
import 'highlight.js/styles/github.css';
import Editor from './Editor';
import { css, SerializedStyles } from '@emotion/react';

type PreviewMarkdownProps = {
  markdown: string;
  setMarkdown: (value: string) => void;
  style?: SerializedStyles;
};

const PreviewMarkdown = ({ markdown, setMarkdown, style }: PreviewMarkdownProps) => {
  const [html, setHtml] = useState<string>('');

  useSyntaxHighlight();

  useEffect(() => {
    setHtml(markdownOfHTML(markdown));
  }, [markdown]);

  return (
    <div
      css={css`
        display: flex;
        column-gap: 2rem;
        ${style}
      `}
    >
      <HtmlText
        style={css`
          width: 100%;
          background-color: #fff;
          padding: 2rem;
        `}
        html={html}
      />
      <Editor
        style={css`
          width: 100%;
        `}
        value={markdown}
        setValue={setMarkdown}
      />
    </div>
  );
};

export default PreviewMarkdown;
