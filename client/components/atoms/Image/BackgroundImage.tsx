/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';

type BackgroundImageProps = {
  backgroundImage: string;
  width: number;
  height: number;
  style?: SerializedStyles;
};

const BackgroundImage = ({ backgroundImage, width, height, style }: BackgroundImageProps) => {
  return (
    <div
      css={css`
        background-color: #fff;
        background-image: url(${backgroundImage});
        background-position: center;
        background-size: cover;
        width: ${width}px;
        height: ${height}px;
        object-fit: contain;
        ${style}
      `}
    ></div>
  );
};

export default BackgroundImage;
