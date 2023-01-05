<div class="col-md-4 col-sm-6 my-2">
	<div class="card m-auto product" style="width: 20rem;">
		<a class="text-decoration-none" href="<?php echo $server; ?>frontend/component/ViewProduct.php?id=<?php echo $r['id'] ?>">
			<img class="card-img-top" src="<?php echo $server; ?>clientapp/asset/images/products/<?php echo $r['image_name']; ?> ?>" alt="Card Image Caption">

			<div class="card-body">
				<h4 class="card-title"><?php echo $r['name']; ?></h4>
				<!-- <p class="card-text"><?php echo $r['brand']; ?></p> -->

				<div style="display: flex; justify-content: space-between; align-items: center;">
					<div style="font-weight: 600;">$<span class="price"><?php echo $r['item_price']; ?></span></div>

					<!-- Button add to cart -->
					<button data-pid="<?php echo $r['id']; ?>" type="button" class="btn-2 buy-button">
						<span class="text-white">
							<i class="fa fa-shopping-cart text-white"></i>
							Add to cart
						</span>
					</button>
				</div>
			</div>
		</a>
	</div>
</div>