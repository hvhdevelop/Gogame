@extends('layout.app')
@section('content')
<!-- section -->
<section class="section section--first section--bg" data-bg="img/bg.jpg">
		<div class="container">
			<!-- article -->
			<div class="article">
				<div class="row">
					<div class="col-12">
						<!-- article content -->
						<div class="article__content article__content--page">
							<img src="img/posts/about.jpg" alt="">

							<h1><u>Các câu hỏi thường gặp</u></h1>
							<p>Cập nhật lần cuối: ngày 11 tháng 6 năm 2021</p>
		
							<h5><u>GoGame là gì? </u></h5>
							<p>GoGame là một cửa hàng kỹ thuật số được tuyển chọn dành cho PC,Console và Mac, được thiết kế cho cả người chơi và người sáng tạo. Nó tập trung vào việc cung cấp các trò chơi tuyệt vời cho người chơi và một thỏa thuận công bằng cho các nhà phát triển trò chơi. Khi bạn mua trò chơi trên GoGame, 88% giá sẽ trực tiếp đến tay nhà phát triển, so với chỉ 70% trên nhiều cửa hàng khác. Điều này giúp các nhà phát triển đầu tư xây dựng các trò chơi lớn hơn và hay hơn.</p>
							<h5><u>GoGame hỗ trợ những nền tảng nào?</u></h5>
							<p>GoGame hiện cung cấp hỗ trợ PC và Mac. Bạn có thể kiểm tra khả năng tương thích của nền tảng cho từng tựa game bằng cách tham khảo phần “Giới thiệu về trò chơi” của bất kỳ trang sản phẩm nào.</p>

							<h5><u>Kế hoạch tương lai cho GoGame là gì?</u></h5>
							<p>Bạn có thể tìm thấy các tính năng sắp tới, các bản cập nhật dành cho nhà phát triển và các vấn đề chính đã biết trên Lộ trình Cửa hàng GoGame trên Trello của chúng tôi . Chúng tôi cũng sẽ chia sẻ các cập nhật quan trọng với bạn trên nguồn cấp dữ liệu tin tức của chúng tôi và các trang truyền thông xã hội như Facebook , Twitter , Instagram và YouTube . 

							<h5><u>Tại sao GoGame thực hiện các giao dịch độc quyền? </u></h5>
							<p>Độc quyền là một phần trong sự phát triển của nhiều nền tảng thành công cho trò chơi và cho các hình thức giải trí kỹ thuật số khác, chẳng hạn như phát trực tuyến video và âm nhạc.
							GoGame hợp tác với các nhà phát triển và nhà xuất bản để cung cấp các trò chơi độc quyền trên cửa hàng. Để đổi lấy tính độc quyền, GoGame cung cấp cho họ hỗ trợ tài chính để phát triển và tiếp thị, cho phép họ xây dựng các trò chơi bóng bẩy hơn với ít sự không chắc chắn hơn đáng kể cho người sáng tạo.
							Ngoài ra, người sáng tạo sẽ kiếm được 88% tổng doanh thu từ trò chơi của họ, trong khi hầu hết các cửa hàng chỉ cung cấp 70%.</p>

							<h5><u>Chương trình Support-A-Creator là gì?</u> </h5>
							<p>Chương trình Support-A-Creator cho phép Người sáng tạo nội dung kiếm tiền từ các trò chơi trong GoGame bằng cách sử dụng Liên kết người sáng tạo và Thẻ người sáng tạo. Tìm hiểu thêm về chương trình Support-A-Creator tại đây . </p>

							<h5><u>Điều này là gì về trò chơi miễn phí?</u></h5>
							<p>GoGame sẽ cung cấp một trò chơi miễn phí mới có sẵn mỗi tuần trong suốt năm 2020. Khi bạn yêu cầu một trò chơi miễn phí, nó là của bạn để giữ - ngay cả sau khi trò chơi không còn miễn phí cho khách hàng mới.</p>

							<h5><u>Tôi đã yêu cầu một trò chơi miễn phí nhưng không thấy trò chơi đó trên tài khoản của tôi bây giờ, tại sao?</u></h5>
							<p>Sau khi bạn yêu cầu một trò chơi miễn phí, nó là của bạn để giữ. Nếu bạn quay lại sau và không thấy đó là tài khoản của mình, vui lòng kiểm tra xem bạn có nhiều tài khoản hay không. Nếu bạn đã tạo tài khoản GoGame bằng địa chỉ email @ gmail.com, hãy đăng nhập trực tiếp vào tài khoản đó bằng mật khẩu Gmail của bạn; sử dụng nút đăng nhập Google sẽ tạo một tài khoản riêng biệt ngay cả khi tài khoản đó được liên kết với cùng một địa chỉ email @ gmail.com. Và kiểm tra xem bạn có cả tài khoản được liên kết với bảng điều khiển (đăng nhập qua tài khoản PlayStation, Xbox hoặc Nintendo) và tài khoản GoGame riêng biệt hay không. Nếu bạn vẫn gặp sự cố, vui lòng liên hệ với bộ phận hỗ trợ người chơi tại đây .</p>

							<h5><u>Tôi có thể thử một trò chơi trước khi tôi mua nó không?</u></h5>
							<p>Một số nhà xuất bản thỉnh thoảng cung cấp bản demo hoặc thời gian dùng thử miễn phí cho một số trò chơi không miễn phí theo thời gian (ví dụ: bản dùng thử Miễn phí Cuối tuần). Trong thời gian dùng thử miễn phí, bạn có thể tải xuống và chơi phiên bản thử nghiệm của trò chơi trước khi quyết định mua, nhưng bạn không thể truy cập trò chơi khi thời gian dùng thử kết thúc.</p>

							<h5><u>Cách hoàn tiền hoạt động trên GoGame?</u></h5>
							<p>ất cả các trò chơi đều đủ điều kiện để được hoàn tiền trong vòng 14 ngày kể từ ngày mua vì bất kỳ lý do gì, miễn là bạn đã có trò chơi chạy dưới 2 giờ. Bạn sẽ không đủ điều kiện để được hoàn lại tiền cho các trò chơi mà bạn đã bị cấm hoặc trò chơi mà bạn đã vi phạm Điều khoản Dịch vụ. Tìm hiểu thêm về chính sách hoàn lại tiền của chúng tôi tại đây . </p>

							<h5><u>Làm cách nào để liên hệ với bộ phận hỗ trợ?</u></h5>
							<p>Bạn có thể liên hệ với nhóm hỗ trợ của chúng tôi tại đây . Chúng tôi cũng khuyên bạn nên duyệt qua các bài viết trong trung tâm hỗ trợ của chúng tôi , bài viết này có thể giúp trả lời các câu hỏi hoặc giải quyết các vấn đề. </p>

							<h5><u>Tài khoản GoGame của tôi có an toàn không? </u></h5>
							<p>Hệ thống tài khoản GoGame cung cấp sức mạnh cho Fortnite, cửa hàng GoGame và Unreal Engine. Hệ thống tài khoản này chưa bao giờ bị xâm phạm. Tuy nhiên, các tài khoản GoGame cá nhân cụ thể đã bị tin tặc xâm nhập bằng cách sử dụng danh sách địa chỉ email và mật khẩu bị rò rỉ từ các trang web khác đã bị xâm nhập.
							Nếu bạn sử dụng cùng một địa chỉ email và mật khẩu trên GoGame như bạn đã sử dụng trên một trang web khác đã bị xâm phạm, thì tài khoản của bạn rất dễ bị tấn công. Để bảo mật tài khoản GoGame của bạn, hãy sử dụng mật khẩu duy nhất và bật xác thực đa yếu tố. Bạn có thể tìm hiểu thêm về các biện pháp chúng tôi thực hiện để bảo vệ tài khoản của bạn và những gì bạn có thể làm để giữ an toàn tại đây .</p>
						</div>
						<!-- end article content -->
					</div>
				</div>
			</div>
			<!-- end article -->
		</div>
	</section>
	<!-- end section -->
@endsection