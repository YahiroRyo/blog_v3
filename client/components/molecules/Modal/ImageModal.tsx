/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';

type ImageModalProps = {
  width: number;
  height: number;
  alt: string;
  src: string;
  onClose?: () => void;
};

const ImageModal = ({ width, height, alt, src, onClose }: ImageModalProps) => {
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
      `}
      onClick={onClose}
    >
      <img width={width} height={height} src={src} alt={alt} />
    </div>
  );
};

export default ImageModal;
