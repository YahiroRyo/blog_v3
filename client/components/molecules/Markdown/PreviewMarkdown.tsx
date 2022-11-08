/** @jsxImportSource @emotion/react */
import { useEffect, useState } from 'react';
import { markdownOfHTML } from '../../../wasm-markdown/pkg/wasm_markdown';
import useSyntaxHighlight from '../../atoms/SyntaxHighlight/syntaxHighlight';
import HtmlText from '../../atoms/Text/HtmlText';
import 'highlight.js/styles/github.css';
import Editor from './Editor';
import { css, SerializedStyles } from '@emotion/react';
import useWindowSize from '../../atoms/Layout/windowSize';

type PreviewMarkdownProps = {
  markdown: string;
  setMarkdown: (value: string) => void;
  style?: SerializedStyles;
};

const PreviewMarkdown = ({ markdown, setMarkdown, style }: PreviewMarkdownProps) => {
  const [html, setHtml] = useState<string>('');
  const size = useWindowSize();

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
          background-color: #fff;
          padding: 2rem;
          width: ${size.width / 2}px;
        `}
        html={html}
      />
      <Editor
        value={markdown}
        setValue={setMarkdown}
        style={css`
          width: ${size.width / 2}px;
          height: 100%;
          overflow-x: auto;
        `}
      />
    </div>
  );
};

export default PreviewMarkdown;
