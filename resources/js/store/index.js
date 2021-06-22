export default {

	state: {
        site: {
			title: null,
			tagline: 'From store The best site builder',
			faviconLink: '/media/pns.jpg', 
			loginURL: 'letmein'
		}, 
		pages: [
			{
				id: 1, 
				title: 'Cart', 
				url: '/cart', 
				type: 'Menu',
				headerCode: "Cart Header Code", 
				body: 'car Body code', 
				footerCode: " cart   Footer code"

			}, 
			{
				id: 2, 
				title: 'Blog', 
				url: '/blog', 
				type: 'Menu',
				headerCode: "Blog Header Code", 
				body: 'Blog Body code', 
				footerCode: "Blog Footer code"

			},
			{
				id: 3, 
				title: 'Portfolio', 
				url: '/portfolio', 
				type: 'Menu',
				headerCode: "Portfolio Header Code", 
				body: 'Portfolio Body code', 
				footerCode: "Portfolio Footer code"

			}
		]
	},
	 
	mutations: {
      
	}
}