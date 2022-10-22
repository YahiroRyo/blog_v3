import axios from 'axios';
import { ClipboardEvent, ComponentProps, DragEvent, useRef } from 'react';

type EditorProps = {
  setValue: (value: string) => void;
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

    const contents = before + `${before.length ? '\n' : ''}${uploadImageText}${after.length ? '\n' : ''}` + after;
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
      const reader = new FileReader();

      const { contents, uploadImageText } = setUploadingTextToValue();

      reader.onload = async (e) => {
        try {
          const response = await axios.post<string>(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/image`, {
            image: e.target!.result,
          });

          const dirs = response.data.split('/');
          setValue(contents.replace(uploadImageText, `![${dirs[dirs.length - 1]}](${response.data})`));
        } catch (e) {
          console.log(e);
          setValue(contents.replace(uploadImageText, `![不明なエラーが発生しました]()`));
        }
      };

      reader.readAsDataURL(imageFile);
      return;
    }
  };

  const onDrop = async (e: DragEvent<HTMLTextAreaElement>) => {
    e.preventDefault();

    const item = e.dataTransfer.files[0];
    const reader = new FileReader();

    const { contents, uploadImageText } = setUploadingTextToValue();

    reader.onload = async (e) => {
      try {
        const response = await axios.post<string>(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/image`, {
          image: e.target!.result,
        });

        const dirs = response.data.split('/');
        setValue(contents.replace(uploadImageText, `![${dirs[dirs.length - 1]}](${response.data})`));
      } catch (e) {
        console.log(e);
        setValue(contents.replace(uploadImageText, `![不明なエラーが発生しました]()`));
      }
    };

    reader.readAsDataURL(item);
    return;
  };

  return (
    <textarea
      style={{ display: 'block', minHeight: '15rem', padding: '1rem', lineHeight: '1.5', ...style }}
      value={value}
      onChange={(e) => setValue(e.target.value)}
      onPaste={onPaste}
      onDrop={onDrop}
      ref={textArea}
    />
  );
};

export default Editor;