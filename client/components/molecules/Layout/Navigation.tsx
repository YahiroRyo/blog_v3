/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { NavItem } from '../../../types/Layout/NavItem';
import NavigationItem from '../../atoms/Layout/NavigationItem';

type NavigationProps = {
  items: NavItem[];
};

const Navigation = ({ items }: NavigationProps) => {
  return (
    <nav
      css={css`
        height: 100%;
      `}
    >
      <ul
        css={css`
          display: flex;
          height: 100%;
          column-gap: 2rem;
          margin: 0;
        `}
      >
        {items.map((item, index) => (
          <NavigationItem key={index} link={item.link}>
            {item.children}
          </NavigationItem>
        ))}
      </ul>
    </nav>
  );
};

export default Navigation;
