import { NextRequest, NextResponse } from 'next/server';

export const middleware = async (req: NextRequest) => {
  if (req.nextUrl.pathname.search(/^\/blogs\/[a-zA-Z0-9]{26}/) !== 0 || !req.nextUrl.searchParams.get('blogId')) {
    return NextResponse.next(req);
  }

  if (req.cookies.has(`blogs/accessed/${req.nextUrl.searchParams.get('blogId')}`)) {
    return NextResponse.next(req);
  }

  await fetch(`${process.env.NEXT_PUBLIC_SSR_API_URL}/api/blogs/${req.nextUrl.searchParams.get('blogId')}/access`, {
    method: 'POST',
    body: JSON.stringify({
      headers: JSON.stringify(req.headers) ?? '',
      userAgent: req.headers.get('user-agent') ?? '',
      referer: req.headers.get('referer') ?? '',
      from: req.headers.get('from') ?? '',
    }),
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
  });

  req.cookies.set(`blogs/accessed/${req.nextUrl.searchParams.get('blogId')}`, true, {
    maxAge: 1800,
  });

  return NextResponse.next(req);
};
