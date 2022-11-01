/** @jsxImportSource @emotion/react */
import { SerializedStyles } from '@emotion/react';
import axios from 'axios';
import { ClipboardEvent, ComponentProps, DragEvent, useRef } from 'react';
import ReactCodeMirror, { ReactCodeMirrorRef } from '@uiw/react-codemirror';
import { markdown, markdownLanguage } from '@codemirror/lang-markdown';
import { languages } from '@codemirror/language-data';
import { sublime } from '@uiw/codemirror-theme-sublime';

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
  const textArea = useRef<ReactCodeMirrorRef>(null);

  const editorCurrentNumber = () => {
    const lines = textArea
      .current!.editor!.querySelector('.cm-editor')
      ?.querySelector('.cm-scroller')
      ?.querySelector('.cm-content')!;
    const currentNode = lines?.querySelector('.cm-activeLine')!;

    for (let i = 0; i < lines.children.length; i++) {
      if (lines.children[i] === currentNode) {
        return i + 1;
      }
    }

    return 1;
  };

  const setUploadingTextToValue = (): {
    contents: string;
    uploadImageText: string;
  } => {
    const currnetNumber = editorCurrentNumber();

    let cursorPos = 0;

    const lines = (value as string).split('\n');
    lines.forEach((line, index) => {
      if (index >= currnetNumber) {
        return;
      }

      cursorPos += line.length + 1;
    });

    const uploadImageText = `![UploadImage...](${generateRandomString(10)}.jpg)`;
    const before = (value as string).substring(0, cursorPos);
    const after = (value as string).substring(cursorPos, (value as string).length);

    const contents = before + uploadImageText + '\n' + after + '\n';
    setValue(contents);

    return {
      contents: contents,
      uploadImageText: uploadImageText,
    };
  };

  const onPaste = async (e: ClipboardEvent<HTMLDivElement>) => {
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

  const onDrop = async (e: DragEvent<HTMLDivElement>) => {
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
    <ReactCodeMirror
      css={style}
      value={value as string}
      extensions={[markdown({ base: markdownLanguage, codeLanguages: languages })]}
      theme={sublime}
      onChange={(value) => {
        setValue(value);
      }}
      onPaste={onPaste}
      onDrop={onDrop}
      ref={textArea}
    />
  );
};

export default Editor;
