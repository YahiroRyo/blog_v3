/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import Link from 'next/link';
import { color } from '../../../styles/color';
import { NavItem } from '../../../types/Layout/NavItem';

const NavigationItem = ({ link, children }: NavItem) => {
  return (
    <li
      css={css`
        list-style: none;
        height: 100%;
      `}
    >
      <Link href={link}>
        <a
          css={css`
            text-decoration: none;
            color: ${color.black};
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 1rem;
            &:hover {
              cursor: pointer;
              background-color: ${color.whiteDark};
            }
          `}
        >
          {children}
        </a>
      </Link>
    </li>
  );
};

export default NavigationItem;
