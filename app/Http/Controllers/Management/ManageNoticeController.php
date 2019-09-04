<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Notice;

class ManageNoticeController extends ManageController
{

    public function index()
    {

        return view('manage.admin.notice.notice', [
            'notices' => $this->getAllNotices(),
        ]);
    }

    public function create()
    {
        return view('manage.admin.notice.addnotice', [
            'notices' => $this->getAllNotices(),
        ]);

    }

    public function store(Request $request)
    {
        $notice = new Notice;

        $notice->notice_tag = $request->tag;
        $notice->notice_title = $request->title;
        $notice->notice_content = $request->content;
        $notice->save();

        return redirect()->route('notice.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        return view('manage.admin.notice.editnotice', [
            'notice' => $this->getNotice($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $notice = Notice::find($id);
        $notice->update([
            'notice_tag' => $request->tag,
            'notice_title' => $request->title,
            'notice_content' => $request->content,
        ]);

        return redirect()->route('notice.index');
    }

    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();

        return redirect()->route('notice.index');
    }
}
