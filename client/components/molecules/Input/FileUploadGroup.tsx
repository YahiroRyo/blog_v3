/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import { ChangeEvent, useRef } from 'react';
import Button from '../../atoms/Button/Button';

type FileUploadGroupProps = {
  style?: SerializedStyles;
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
    <div css={style}>
      <Button
        type='button'
        onClick={(e) => {
          fileInput.current!.click();
        }}
      >
        {children}
      </Button>
      <input
        ref={fileInput}
        onChange={changeFile}
        css={css`
          display: none;
        `}
        type='file'
      />
    </div>
  );
};

export default FileUploadGroup;
