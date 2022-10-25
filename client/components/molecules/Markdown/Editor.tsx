/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import axios from 'axios';
import { ClipboardEvent, ComponentProps, DragEvent, useRef } from 'react';

type EditorProps = {
  setValue: (value: string) => void;
  style?: SerializedStyles;
} & ComponentProps<'textarea'>;

const generateRandomString = (num: number) => {
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  let result = '';
  const charactersLength = characters.length;
  for (let i = 0; i < num; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }

  return result;
};

const Editor = ({ setValue, value, style }: EditorProps) => {
  const textArea = useRef<HTMLTextAreaElement>(null);

  const setUploadingTextToValue = (): {
    contents: string;
    uploadImageText: string;
  } => {
    const cursorPos = textArea.current!.selectionStart;

    const uploadImageText = `![UploadImage...](${generateRandomString(10)}.jpg)`;
    const before = (value as string).substring(1, cursorPos);
    const after = (value as string).substring(cursorPos, (value as string).length - 1);

    const beforeLines = before.split('\n');
    const contents = before + `${beforeLines[beforeLines.length - 1].length ? '\n' : ''}${uploadImageText}` + after;
    setValue(contents);

    return {
      contents: contents,
      uploadImageText: uploadImageText,
    };
  };

  const onPaste = async (e: ClipboardEvent<HTMLTextAreaElement>) => {
    const item = e.clipboardData.items[0];

    if (item.type.indexOf('image') === 0) {
      e.preventDefault();

      const imageFile = item.getAsFile()!;

      const { contents, uploadImageText } = setUploadingTextToValue();

      try {
        const formData = new FormData();
        formData.append('image', imageFile);

        const response = await axios.post<string>(
          `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/image`,
          formData,
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem('token')}`,
            },
          },
        );

        const dirs = response.data.split('/');
        setValue(contents.replace(uploadImageText, `![${dirs[dirs.length - 1]}](${response.data})`));
      } catch (e) {
        console.log(e);
        setValue(contents.replace(uploadImageText, `![不明なエラーが発生しました]()`));
      }
    }
  };

  const onDrop = async (e: DragEvent<HTMLTextAreaElement>) => {
    e.preventDefault();

    const item = e.dataTransfer.files[0];

    const { contents, uploadImageText } = setUploadingTextToValue();

    try {
      const formData = new FormData();
      formData.append('image', item);

      const response = await axios.post<string>(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/image`, formData, {
        headers: {
          Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
      });

      const dirs = response.data.split('/');
      setValue(contents.replace(uploadImageText, `![${dirs[dirs.length - 1]}](${response.data})`));
    } catch (e) {
      console.log(e);
      setValue(contents.replace(uploadImageText, `![不明なエラーが発生しました]()`));
    }
  };

  return (
    <textarea
      css={css`
        display: block;
        min-height: 15rem;
        padding: 1rem;
        line-height: 1.5;
        ${style}
      `}
      value={value}
      onChange={(e) => setValue(e.target.value)}
      onPaste={onPaste}
      onDrop={onDrop}
      ref={textArea}
    />
  );
};

export default Editor;
