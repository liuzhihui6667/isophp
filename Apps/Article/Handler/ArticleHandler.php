<?php
/**
 *
 * @author ln6265431@163.com
 * @date: 2018/1/13下午9:15
 */
namespace TopCms\Apps\Article\Handler;
use TopCms\Apps\Article\ArticleInfo;
use TopCms\Framework\Exceptions\ApiParamErrorException;
use TopCms\Framework\Handler\BaseHandler;

/**
 * Class ArticleHandler
 */
class ArticleHandler extends BaseHandler
{
    public function addAction($params)
    {
        sleep(5);
        $title = $params['title'] ?? '';
        $content = $params['content'] ?? '';
        $categoryId = $params['categoryId'] ?? '';
        // todo 获得当前用户
        $author = 'admin';
        $status = $params['status'] ?? '';
        $extra = $params['extra'] ?? array();
        $articleInfo = new ArticleInfo();
        list($status, $message) = $articleInfo->add($title, $content, $categoryId, $author, $status, $extra);
        if ($status) {
            $this->successJson(['message' => 'success', 'id' => $message]);
        } else {
            throw new ApiParamErrorException($message);
        }
    }

    public function updateAction($params)
    {
        sleep(5);
        $id = $params['id']?? '';
        $title = $params['title'] ?? '';
        $content = $params['content'] ?? '';
        $categoryId = $params['categoryId'] ?? '';
        // todo 获得当前用户
        $author = 'admin';
        $status = $params['status'] ?? '';
        $extra = $params['extra'] ?? array();
        $articleInfo = new ArticleInfo();
        if (empty($id)) {
            throw new ApiParamErrorException('lost param id');
        }
        list($status, $message) = $articleInfo->save($id, $title, $content, $categoryId, $author, $status, $extra);
        if ($status) {
            $this->successJson(['message' => 'success', 'id' => $message]);
        } else {
            throw new ApiParamErrorException($message);
        }
    }
}