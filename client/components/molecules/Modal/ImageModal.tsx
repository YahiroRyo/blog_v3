/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import useWindowSize from '../../atoms/Layout/windowSize';

type ImageModalProps = {
  alt: string;
  src: string;
  onClose?: () => void;
};

const ImageModal = ({ alt, src, onClose }: ImageModalProps) => {
  const size = useWindowSize();
  const width = size.width < 500 ? size.width - 10 : size.width - size.width / 3;

  return (
    <div
      css={css`
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.75);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 100;
      `}
      onClick={onClose}
    >
      <img
        css={css`
          width: ${width}px;
        `}
        src={src}
        alt={alt}
      />
    </div>
  );
};

export default ImageModal;
