/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import { MouseEvent } from 'react';
import { color } from '../../../styles/color';

type ReloadButtonProps = {
  style?: SerializedStyles;
  onClick?: (e: MouseEvent<HTMLButtonElement>) => void;
};

const ReloadButton = ({ style, onClick }: ReloadButtonProps) => {
  return (
    <button
      css={css`
        font-size: 1rem;
        padding: 0.4rem 0.8rem;
        border: 1px solid ${color.black};
        background-color: ${color.white};
        &:hover {
          background-color: ${color.gray};
          cursor: pointer;
        }
        ${style}
      `}
      onClick={onClick}
      type={'button'}
    >
      <img
        css={css`
          width: 20px;
          height: 20px;
        `}
        src='/icons/reload.svg'
        alt='リロードボタン'
      />
    </button>
  );
};

export default ReloadButton;
