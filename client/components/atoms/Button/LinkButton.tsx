/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import Link from 'next/link';
import { color } from '../../../styles/color';

type LinkButtonProps = {
  type: 'button' | 'submit' | 'reset' | undefined;
  children: React.ReactNode;
  href: string;
  style?: SerializedStyles;
};

const LinkButton = ({ type, children, href, style }: LinkButtonProps) => {
  return (
    <button
      css={css`
        border: 0;
        display: flex;
        background-color: transparent;
        &:hover {
          cursor: pointer;
        }
      `}
      type={type}
    >
      <Link href={href}>
        <a
          css={css`
            font-size: 1rem;
            padding: 1.25rem 3rem;
            border-radius: 3rem;
            background-color: ${color.black};
            color: ${color.white};
            text-decoration: none;
            ${style}
          `}
        >
          {children}
        </a>
      </Link>
    </button>
  );
};

export default LinkButton;
