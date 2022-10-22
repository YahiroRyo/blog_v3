import Image from 'next/image';

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
      style={{
        position: 'fixed',
        top: 0,
        left: 0,
        width: '100vw',
        height: '100vh',
        backgroundColor: 'rgba(0, 0, 0, .25)',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
      }}
      onClick={onClose}
    >
      <img width={width} height={height} src={src} alt={alt} />
    </div>
  );
};

export default ImageModal;
