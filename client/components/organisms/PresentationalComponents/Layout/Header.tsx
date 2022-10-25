/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { color } from '../../../../styles/color';
import Logo from '../../../molecules/Layout/Logo';

const Header = () => {
  return (
    <header
      css={css`
        height: 5rem;
        background-color: ${color.white};
        width: 100%;
      `}
    >
      <div
        css={css`
          width: 80%;
          margin: 0 auto;
          display: flex;
          align-items: center;
          height: 100%;
        `}
      >
        <Logo />
      </div>
    </header>
  );
};

export default Header;
