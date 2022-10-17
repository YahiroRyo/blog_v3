import { ChangeEvent, CSSProperties, useRef } from 'react';
import Button from '../../atoms/Button/Button';

type FileUploadGroupProps = {
  style?: CSSProperties;
  setValue: (value: File) => void;
  children: React.ReactNode;
};

const FileUploadGroup = ({ setValue, style, children }: FileUploadGroupProps) => {
  const fileInput = useRef<HTMLInputElement>(null);

  const changeFile = (e: ChangeEvent<HTMLInputElement>) => {
    if (!e.target.files || !e.target.files[0]) return;

    setValue(e.target.files[0]);
  };

  return (
    <div style={style}>
      <Button
        type='button'
        onClick={(e) => {
          fileInput.current!.click();
        }}
      >
        {children}
      </Button>
      <input ref={fileInput} onChange={changeFile} style={{ display: 'none' }} type='file' />
    </div>
  );
};

export default FileUploadGroup;
