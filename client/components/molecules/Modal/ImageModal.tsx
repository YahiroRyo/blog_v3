/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import useWindowSize from '../../atoms/Layout/windowSize';

type ImageModalProps = {
  width: number;
  height: number;
  alt: string;
  src: string;
  onClose?: () => void;
};

const ImageModal = ({ width, height, alt, src, onClose }: ImageModalProps) => {
  const size = useWindowSize();

  return (
    <div
      css={css`
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 100;
      `}
      onClick={onClose}
    >
      <img
        css={css`
          width: ${size.width - 100};
        `}
        src={src}
        alt={alt}
      />
    </div>
  );
};

export default ImageModal;
