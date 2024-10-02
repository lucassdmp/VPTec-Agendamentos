<?php

namespace VPTec\Agendamentos\Templates;

class RegisterServiceForm
{
    public function __construct()
    {
    }

    function Render()
    {
        ?>
        <div class="vptec-form-container vptec-register-service">
            <form id="vptec-register-service-form" method="post">
                <div class="vptec-form-group">
                    <label for="name">Nome do serviço</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="vptec-form-group">
                    <label for="wc_product_id">ID do produto no WooCommerce</label>
                    <select name="wc_product_id">
                        <option value="0">Selecione um produto</option>
                        <?php
                        $products = $this->GetAllWCProducts();
                        foreach ($products as $product) {
                            echo "<option value='$product->ID'>$product->post_title</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="vptec-form-group">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <div class="vptec-form-group">
                    <label for="price">Preço</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <button type="submit">Cadastrar serviço</button>
            </form>
        </div>
        <?php
    }

    private function GetAllWCProducts()
    {
        global $wpdb;
        $products = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'product' and post_status = 'publish'");
        return $products;
    }
}