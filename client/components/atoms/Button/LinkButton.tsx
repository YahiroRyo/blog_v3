import Link from 'next/link';
import { CSSProperties } from 'react';
import { color } from '../../../styles/color';

type LinkButtonProps = {
  type: 'button' | 'submit' | 'reset' | undefined;
  children: React.ReactNode;
  href: string;
  style?: CSSProperties;
};

const LinkButton = ({ type, children, href, style }: LinkButtonProps) => {
  return (
    <button
      style={{
        border: 0,
        display: 'flex',
        backgroundColor: 'transparent',
      }}
      type={type}
    >
      <Link href={href}>
        <a
          style={{
            fontSize: '1rem',
            padding: '1.25rem 3rem',
            borderRadius: '3rem',
            backgroundColor: color.black,
            color: color.white,
            textDecoration: 'none',
            ...style,
          }}
        >
          {children}
        </a>
      </Link>
    </button>
  );
};

export default LinkButton;
