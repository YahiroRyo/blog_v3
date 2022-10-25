/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import Link from 'next/link';
import LergeTitle from '../../atoms/Text/LergeTitle';

const Logo = () => {
  return (
    <Link href='/'>
      <a
        css={css`
          text-decoration: none;
          &:hover {
            cursor: pointer;
          }
        `}
      >
        <LergeTitle>rm -rf /</LergeTitle>
      </a>
    </Link>
  );
};

export default Logo;
