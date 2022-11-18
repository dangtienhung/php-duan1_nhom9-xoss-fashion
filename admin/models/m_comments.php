<!-- đặng tiến hưng -->

<?php

include('database.php');

@session_start();

class m_comments extends database
{
    // lấy ra tất cả các bình luận
    public function get_comments($number_in_on_page, $clear)
    {
        $sql = "select 
                comment.*,
                customer.*,
                product.*,
                comment.id as id_comment
                from comment
                join customer on comment.idPerson = customer.id
                join product on comment.idItem = product.id
                limit $number_in_on_page
                offset $clear;";
        $this->setQuery($sql);
        return $this->loadAllRows(array($number_in_on_page, $clear));
    }

    // tìm kiếm bình luận
    public function get_search($search, $number_in_on_page, $clear)
    {

        $sql = "select 
                    comment.*,
                    customer.*,
                    product.*,
                    comment.id as id_comment
                    from comment
                    join customer on comment.idPerson = customer.id
                    join product on comment.idItem = product.id
                    where comment.comment_content like '%$search%'
                    limit $number_in_on_page
                    offset $clear;";
        $this->setQuery($sql);
        return $this->loadAllRows(array($search, $number_in_on_page, $clear));
    }

    // đếm số lượng bình luận trùng với từ khóa search
    public function get_count_search($search)
    {
        $sql = "select count(*) from comment where comment_content like '%$search%'";
        $this->setQuery($sql);
        return $this->loadRecord(array($search));
    }

    // lấy ra comment theo idItem
    public function get_one_comments($id)
    {
        $sql = "delete from comment where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
}