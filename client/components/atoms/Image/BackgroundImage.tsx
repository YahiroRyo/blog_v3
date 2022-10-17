import { CSSProperties } from 'react';

type BackgroundImageProps = {
  backgroundImage: string;
  width: number;
  height: number;
  style?: CSSProperties;
};

const BackgroundImage = ({ backgroundImage, width, height, style }: BackgroundImageProps) => {
  return (
    <div
      style={{
        backgroundColor: '#fff',
        backgroundImage: `url(${backgroundImage})`,
        backgroundPosition: 'center',
        backgroundSize: 'cover',
        width: width,
        height: height,
        objectFit: 'contain',
        ...style,
      }}
    ></div>
  );
};

export default BackgroundImage;
