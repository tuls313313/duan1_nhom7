    <?php class Thongke
    {
        public $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function loadallthongke()
        {
            $sql = "
        SELECT 
            categories.id AS madm, 
            categories.name AS tendm, 
            COUNT(product.id) AS countsp, 
            MIN(product.price) AS minprice, 
            MAX(product.price) AS maxprice, 
            AVG(product.price) AS avgprice
        FROM product 
        LEFT JOIN categories ON categories.id = product.id_categories
        GROUP BY categories.id, categories.name
        ORDER BY categories.id DESC ";
            return $this->db->getAll($sql);
        }
      
    }
